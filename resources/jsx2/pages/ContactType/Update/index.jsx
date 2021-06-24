import Axios from 'axios'
import React, { Component } from 'react'

export default class Update extends Component {
    constructor(props) {
        super(props);

        const { name } = this.props.needUpdateData
        // console.log(this.props.needUpdateData);

        this.state = {
            name,
        };
    }

    updateData = (event) => {
        event.preventDefault()
        // 取得關閉update page的方法
        const { updatePageDown, updateTable } = this.props
        // 取得存在state的input value
        const {
            name,
        } = this.state

        let formData = new FormData()
        // PUT方法搞了我一整天，最後選擇用POST假裝PUT...
        formData.append('_method', 'put')
        formData.append('name', name)

        // 取得要更新的資料
        const { needUpdateData } = this.props
        // 發出更新的請求
        // 成功後更新資料
        // 關閉更新頁面
        if (true) {
            Axios.post(`admin/contact_type/${needUpdateData.id}`, formData)
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
            name,
        } = this.state
        return (
            <div className="container">
                <h1 className="display-3 text-center">連絡類型 編輯</h1>
                <form action="" method="POST" encType="multipart/form-data">
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
