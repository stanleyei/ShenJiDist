import Axios from 'axios'
import React, { Component } from 'react'

export default class Update extends Component {
    constructor(props) {
        super(props);

        const {
            shop_id,
            content,
            img,
        } = this.props.needUpdateData
        // console.log(this.props.needUpdateData);

        this.state = {
            // 避免一開始render 使用map時錯誤，先設定[]
            upperRelation: [],
            shop_id,
            content,
            img,
        };

        // 新增頁面有上層關連的需要取得上層所有選項
        // 在controller新增取得此筆資料的method
        // 寫一固定路徑，依照傳過去的upperName回傳對應的上層資料
        axios.post("/admin/upper_data", {
            // 在此輸入需要的上層名稱
            upperName: 'shop'
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
            shop_id,
            content,
            img,
        } = this.state

        let formData = new FormData()
        formData.append('_method', 'PUT')
        formData.append('shop_id', shop_id)
        formData.append('content', content)
        formData.append('img', img)

        // 取得要更新的資料
        const { needUpdateData } = this.props
        // 發出更新的請求
        // 成功後更新資料
        // 關閉更新頁面
        if (true) {
            Axios.post(`admin/shop_img/${needUpdateData.id}`, formData)
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
            upperRelation,
            shop_id,
            content,
        } = this.state

        return (
            <div className="container">
                <h1 className="display-3 text-center">店家圖片 新增</h1>
                <form action="" method="POST" encType="multipart/form-data">
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="shop_id">附屬於</label>
                        <select value={shop_id} onChange={(c) => this.handleValue(c, 'shop_id')} className="form-control" name="shop_id" id="shop_id">
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
                        <label className="col-sm-2 col-form-label" htmlFor="content">內容</label>
                        <textarea value={content} onChange={(c) => this.handleValue(c, 'content')} className="form-control" id="content" name="content" cols="30" rows="10"></textarea>
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="img">圖片</label>
                        <input onChange={(c) => this.handleValue(c, 'img')} className="form-control" id="img" name="img" type="file" accept="image/*" />
                        <div className="pre-img-div" style={{ backgroundImage: `url(${needUpdateData.img})` }}></div>
                    </div>
                    <button className="btn btn-secondary" onClick={updatePageDown}>取消</button>
                    <button onClick={this.updateData} className="btn btn-primary">編輯</button>
                </form>
            </div>
        )
    }
}
