import Axios from 'axios'
import React, { Component } from 'react'

export default class Update extends Component {
    constructor(props) {
        super(props);

        const {
            name,
            img,
            content,
        } = this.props.needUpdateData
        // console.log(this.props.needUpdateData);

        this.state = {
            name,
            img,
            content,
        };
    }

    updateData = (event) => {
        event.preventDefault()
        // 取得關閉update page的方法
        const { updatePageDown, updateTable } = this.props
        // 取得存在state的input value
        const {
            name,
            img,
            content,
        } = this.state

        let formData = new FormData()
        formData.append('_method', 'PUT')
        formData.append('name', name)
        formData.append('img', img)
        formData.append('content', content)

        // 取得要更新的資料
        const { needUpdateData } = this.props
        // 發出更新的請求
        // 成功後更新資料
        // 關閉更新頁面
        if (true) {
            Axios.post(`admin/slider/${needUpdateData.id}`, formData)
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
        const { updatePageDown, needUpdateData } = this.props
        const {
            name,
            content,
        } = this.state

        return (
            <div className="container">
                <h1 className="display-3 text-center">Slider 新增</h1>
                <form action="" method="POST" encType="multipart/form-data">
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="name">名稱</label>
                        <input value={name} onChange={(c) => this.handleValue(c, 'name')} className="form-control" id="name" name="name" type="text" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="img">圖片</label>
                        <input onChange={(c) => this.handleValue(c, 'img')} className="form-control" id="img" name="img" type="file" accept="image/*" />
                        <div className="pre-img-div" style={{ backgroundImage: `url(${needUpdateData.img})` }}></div>
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="content">內容</label>
                        <textarea value={content} onChange={(c) => this.handleValue(c, 'content')} className="form-control" id="content" name="content" cols="30" rows="10"></textarea>
                    </div>
                    <button className="btn btn-secondary" onClick={updatePageDown}>取消</button>
                    <button onClick={this.updateData} className="btn btn-primary">編輯</button>
                </form>
            </div>
        )
    }
}
