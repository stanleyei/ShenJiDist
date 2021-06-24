import Axios from 'axios'
import React, { Component } from 'react'

export default class Update extends Component {
    constructor(props) {
        super(props);

        const {
            name,
            content,
            phone,
            address,
            time_open,
            time_close,
        } = this.props.needUpdateData

        this.state = {
            name,
            content,
            phone,
            address,
            time_open,
            time_close,
        };
    }

    updateData = (event) => {
        event.preventDefault()
        // 取得關閉update page的方法
        const { updatePageDown, updateTable } = this.props
        // 取得存在state的input value
        const {
            name,
            content,
            phone,
            address,
            time_open,
            time_close
        } = this.state
        let formData = new FormData()
        // PUT方法搞了我一整天，最後選擇用POST假裝PUT...
        formData.append('_method', 'put')
        formData.append('name', name)
        formData.append('content', content)
        formData.append('phone', phone)
        formData.append('address', address)
        formData.append('time_open', time_open)
        formData.append('time_close', time_close)

        // 取得要更新的資料
        const { needUpdateData } = this.props
        // 發出更新的請求
        // 成功後更新資料
        // 關閉更新頁面
        if (true) {
            Axios.post(`admin/view/${needUpdateData.id}`, formData)
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
        // 在這裡處理input value的變動
        if (e.target.files !== null && e.target.files !== undefined) {
            this.setState({ [stateName]: e.target.files[0] })
        } else {
            this.setState({ [stateName]: e.target.value })
        }
    }

    render() {
        const { updatePageDown } = this.props
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
                <h1 className="display-3 text-center">景點列表 編輯</h1>
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
                    <button className="btn btn-secondary" onClick={updatePageDown}>取消</button>
                    <button onClick={this.updateData} className="btn btn-primary">編輯</button>
                </form>
            </div>
        )
    }
}
