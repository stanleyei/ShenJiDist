import Axios from 'axios'
import React, { Component } from 'react'

export default class Create extends Component {
    constructor(props) {
        super(props);

        this.state = {
            // 避免一開始render 使用map時錯誤，先設定[]
            upperRelation: [],
            name: '',
        };

    }

    createNewData = (event) => {
        // 避免button預設事件
        event.preventDefault()
        // 取得關閉新增頁、更新table的方法
        const { createPageDown, updateTable } = this.props
        // 取得input value
        const {
            name,
        } = this.state
        let formData = new FormData()
        formData.append('name', name)

        // // 判斷是否都存在，目前是全部都必填，新增按鈕才有效
        // const checkExist = inputTypeinfoTypeId && inputName && inputContent && inputImg && inputDateStart && inputDateEnd && inputLocation && inputOrganizer && inputCalendar
        // request 後端新增資料
        // if (checkExist) {
        // 不同頁面要不同路徑
        Axios.post('admin/contact_type', formData).then(response => {
            // 回傳的資料是新資料，直接丟回上層state
            updateTable(response.data)
            // 關閉新增頁
            createPageDown()
        })
        // }
    }

    handleValue = (e, stateName) => {
        // 在這裡處理input value的變動
        this.setState({ [stateName]: e.target.value })
    }

    render() {
        const { createPageDown } = this.props
        const {
            name,
        } = this.state
        return (
            <div className="container">
                <h1 className="display-3 text-center">連絡類型 新增</h1>
                <form action="" method="POST" encType="multipart/form-data">
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
