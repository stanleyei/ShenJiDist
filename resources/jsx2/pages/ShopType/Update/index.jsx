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

        let newData = new FormData()
        // PUT方法搞了我一整天，最後選擇用POST假裝PUT...
        newData.append('_method', 'put')
        newData.append('name', name)

        // 取得要更新的資料
        const { needUpdateData } = this.props
        // 發出更新的請求
        // 成功後更新資料
        // 關閉更新頁面
        Axios.post(`admin/shop_type/${needUpdateData.id}`, newData)
            .then(response => {
                // console.log(response.data);
                // 回傳的資料是新資料，直接丟回上層state
                updateTable(response.data)
                // 關閉編輯頁
                updatePageDown()
            })

    }

    handleValue = (e, stateName) => {
        // 在這裡處理input value的變動
        this.setState({ [stateName]: e.target.value })
    }

    render() {
        const { updatePageDown, needUpdateData } = this.props
        const { name } = this.state
        // console.log(needUpdateData.info_type.id);
        return (
            <div className="container">
                <h1 className="display-3 text-center">店家類型 編輯</h1>
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
