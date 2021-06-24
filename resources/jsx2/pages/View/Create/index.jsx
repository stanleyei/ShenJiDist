import Axios from 'axios'
import React, { Component } from 'react'

export default class Create extends Component {
    constructor(props) {
        super(props);

        this.state = {
            // 避免一開始render 使用map時錯誤，先設定[]
            upperRelation: [],
            name: '',
            content: '',
            phone: '',
            address: '',
            time_open: '',
            time_close: '',
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
            content,
            phone,
            address,
            time_open,
            time_close
        } = this.state
        let formData = new FormData()
        formData.append('name', name)
        formData.append('content', content)
        formData.append('phone', phone)
        formData.append('address', address)
        formData.append('time_open', time_open)
        formData.append('time_close', time_close)

        // // 判斷是否都存在，目前是全部都必填，新增按鈕才有效
        // const checkExist = inputTypeinfoTypeId && inputName && inputContent && inputImg && inputDateStart && inputDateEnd && inputLocation && inputOrganizer && inputCalendar
        // request 後端新增資料
        // if (checkExist) {
        // 不同頁面要不同路徑
        Axios.post('admin/view', formData).then(response => {
            // 回傳的資料是新資料，直接丟回上層state
            updateTable(response.data)
            // 關閉新增頁
            createPageDown()
        })
        // }
    }

    handleValue = (e, stateName) => {
        // 在這裡處理input value的變動
        if (e.target.files !== null && e.target.files !== undefined) {
            this.setState({ [stateName]: e.target.files[0] })
        } else {
            this.setState({ [stateName]: e.target.value })
        }
    }

    render() {
        const { createPageDown } = this.props
        const {
            name,
            content,
            phone,
            address,
            time_open,
            time_close,
        } = this.state
        return (
            <div className="container">
                <h1 className="display-3 text-center">景點列表 新增</h1>
                <form action="" method="POST" encType="multipart/form-data">
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="name">名稱</label>
                        <input value={name} onChange={(c) => this.handleValue(c, 'name')} className="form-control" id="name" name="name" type="text" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="content">內容</label>
                        <textarea value={content} onChange={(c) => this.handleValue(c, 'content')} className="form-control" id="content" name="content" cols="30" rows="10"></textarea>
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="phone">連絡電話</label>
                        <input value={phone} onChange={(c) => this.handleValue(c, 'phone')} className="form-control" id="phone" name="phone" type="text" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="address">地址</label>
                        <input value={address} onChange={(c) => this.handleValue(c, 'address')} className="form-control" id="address" name="address" type="text" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="time_open">開店時間</label>
                        <input value={time_open} onChange={(c) => this.handleValue(c, 'time_open')} className="form-control" id="time_open" name="time_open" type="number" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="time_close">關店時間</label>
                        <input value={time_close} onChange={(c) => this.handleValue(c, 'time_close')} className="form-control" id="time_close" name="time_close" type="number" />
                    </div>
                    <button className="btn btn-secondary" onClick={createPageDown}>取消</button>
                    <button onClick={this.createNewData} className="btn btn-primary">新增</button>
                </form>
            </div>
        )
    }
}
