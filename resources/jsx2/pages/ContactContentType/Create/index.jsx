import Axios from 'axios'
import React, { Component } from 'react'

export default class Create extends Component {
    constructor(props) {
        super(props);

        this.state = {
            // 避免一開始render 使用map時錯誤，先設定[]
            upperRelation: [],
            type_id: '',
            name: '',
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
                this.setState({ upperRelation: response.data, type_id: response.data[0].id })
            }
        )
    }

    createNewData = (event) => {
        // 避免button預設事件
        event.preventDefault()
        // 取得關閉新增頁、更新table的方法
        const { createPageDown, updateTable } = this.props
        // 取得input value
        const {
            type_id,
            name,
        } = this.state
        let formData = new FormData()
        formData.append('type_id', type_id)
        formData.append('name', name)

        // // 判斷是否都存在，目前是全部都必填，新增按鈕才有效
        // const checkExist = inputTypeinfoTypeId && inputName && inputContent && inputImg && inputDateStart && inputDateEnd && inputLocation && inputOrganizer && inputCalendar
        // request 後端新增資料
        // if (checkExist) {
        // 不同頁面要不同路徑
        Axios.post('admin/contact_content_type', formData).then(response => {
            // 回傳的資料是新資料，直接丟回上層state
            updateTable(response.data)
            // 關閉新增頁
            createPageDown()
        })
        // }
    }

    handleValue = (e, stateName) => {
        this.setState({ [stateName]: e.target.value })
    }

    render() {
        const { createPageDown } = this.props
        const {
            upperRelation,
            type_id,
            name,
        } = this.state
        return (
            <div className="container">
                <h1 className="display-3 text-center">連絡內容類型 新增</h1>
                <form action="" method="POST" encType="multipart/form-data">
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="type_id">附屬於</label>
                        <select value={type_id} onChange={(c) => this.handleValue(c, 'type_id')} className="form-control" name="type_id" id="type_id">
                            {
                                upperRelation.map((data) => {
                                    return (
                                        <option key={data.id} value={data.id}>{data.name}</option>
                                    )
                                })
                            }
                        </select>
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="name">名稱</label>
                        <input value={name} onChange={(c) => this.handleValue(c, 'name')} className="form-control" id="name" name="name" type="text" />
                    </div>
                    <button className="btn btn-secondary" onClick={createPageDown}>取消</button>
                    <button onClick={this.createNewData} className="btn btn-primary">新增</button>
                </form>
            </div>
        )
    }
}
