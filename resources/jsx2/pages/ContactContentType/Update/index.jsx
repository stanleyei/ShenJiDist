import Axios from 'axios'
import React, { Component } from 'react'

export default class Update extends Component {
    constructor(props) {
        super(props);

        const { type_id, name } = this.props.needUpdateData
        // console.log(this.props.needUpdateData);

        this.state = {
            // 避免一開始render 使用map時錯誤，先設定[]
            upperRelation: [],
            type_id,
            name,
        };

        // 新增頁面有上層關連的需要取得上層所有選項
        // 在controller新增取得此筆資料的method
        // 寫一固定路徑，依照傳過去的upperName回傳對應的上層資料
        axios.post("/admin/upper_data", {
            // 在此輸入需要的上層名稱
            upperName: 'contact_type'
        }).then(
            response => {
                // 將回傳的上層關連存入state
                this.setState({ upperRelation: response.data })
            }
        )
    }

    updateData = (event) => {
        event.preventDefault()
        // 取得關閉update page的方法
        const { updatePageDown, updateTable } = this.props
        // 取得存在state的input value
        const {
            type_id,
            name,
        } = this.state

        let formData = new FormData()
        // PUT方法搞了我一整天，最後選擇用POST假裝PUT...
        formData.append('_method', 'put')
        formData.append('type_id', type_id)
        formData.append('name', name)

        // 取得要更新的資料
        const { needUpdateData } = this.props
        // 發出更新的請求
        // 成功後更新資料
        // 關閉更新頁面
        if (true) {
            Axios.post(`admin/contact_content_type/${needUpdateData.id}`, formData)
                .then(response => {
                    // console.log(response.data);
                    // 回傳的資料是新資料，直接丟回上層state
                    updateTable(response.data)
                    // 關閉編輯頁
                    updatePageDown()
                })
        }

    }

    handleValue = (e, stateName) => {
        this.setState({ [stateName]: e.target.value })
    }

    render() {
        const { updatePageDown, needUpdateData } = this.props
        const {
            upperRelation,
            type_id,
            name,
        } = this.state
        return (
            <div className="container">
                <h1 className="display-3 text-center">連絡內容類型 編輯</h1>
                <form action="" method="POST" encType="multipart/form-data">
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="type_id">附屬於</label>
                        <select value={type_id} onChange={(c) => this.handleValue(c, 'type_id')} className="form-control" name="type_id" id="type_id">
                            {
                                upperRelation.map((data) => {
                                    return (
                                        <option key={data.id} value={data.id} >{data.name}</option>
                                    )
                                })
                            }
                        </select>
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="name">名稱</label>
                        <input value={name} onChange={(c) => this.handleValue(c, 'name')} className="form-control" id="name" name="name" type="text" />
                    </div>
                    <button className="btn btn-secondary" onClick={updatePageDown}>取消</button>
                    <button onClick={this.updateData} className="btn btn-primary">編輯</button>
                </form>
            </div>
        )
    }
}
