import Axios from 'axios'
import React, { Component } from 'react'
import Cropper from '../../../js/cropper.js'

export default class Create extends Component {
    constructor(props) {
        super(props);

        this.state = {
            // 避免一開始render 使用map時錯誤，先設定[]
            upperRelation: [],
            shop_id: '',
            content: '',
            img: '',
            ratioName: 'ratio43',
            cropper: false,
            cropperArgs: {
                aspectRatio: 4 / 3,
                viewMode: 3,
                preview: '.preview'
            },
            canvasSize: {
                width: 800,
                height: 600,
            }
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
                this.setState({ upperRelation: response.data, shop_id: response.data[0].id })
            }
        )
    }

    createNewData = async (event) => {
        // 避免button預設事件
        event.preventDefault()
        // 取得關閉新增頁、更新table的方法
        const { createPageDown, updateTable } = this.props
        // 取得input value
        const {
            shop_id,
            content,
            // img,
        } = this.state

        // 取得圖片檔案
        await this.getCanvas();
        const inputImg = this.cropImg

        let formData = new FormData()
        formData.append('shop_id', shop_id)
        formData.append('content', content)
        formData.append('img', inputImg)

        // // 判斷是否都存在，目前是全部都必填，新增按鈕才有效
        // const checkExist = inputTypeinfoTypeId && inputName && inputContent && inputImg && inputDateStart && inputDateEnd && inputLocation && inputOrganizer && inputCalendar
        // request 後端新增資料
        // if (checkExist) {
        // 不同頁面要不同路徑
        Axios.post('admin/shop_img', formData).then(response => {
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

    handleRatio = (e, name) => {
        e.preventDefault()

        const { cropper } = this.state

        this.setState({ ratioName: name })
        if (name === 'ratio169') {
            cropper.setAspectRatio(16 / 9)
        } else if (name === 'ratio43') {
            cropper.setAspectRatio(4 / 3)
        }
    }

    handleImgChange = (params) => {
        const { cropperArgs } = this.state

        let cropper = this.state.cropper
        if (cropper) {
            cropper.destroy()
        }
        let image = document.getElementById('image');
        let reader, file;

        const files = params.target.files;
        const done = url => image.src = url

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = (e) => {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }

            this.setState({ cropper: new Cropper(image, cropperArgs) })

        }

    }

    getCanvas = (params) => {

        return new Promise(resolve => {
            const { cropper, canvasSize } = this.state
            if (cropper) {
                let canvas = cropper.getCroppedCanvas(canvasSize);
                if (canvas !== null) {
                    canvas.toBlob((blob) => {
                        this.cropImg = new File([blob], "img");
                        resolve()
                    });
                }
            }
        })
    }

    render() {
        const { createPageDown } = this.props
        const {
            upperRelation,
            shop_id,
            content,
            cropper,
            ratioName
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
                        <input onChange={this.handleImgChange} className="form-control image" id="img" name="img" type="file" accept="image/*" />
                    </div>

                    <div className="img-container">
                        <div className="row">
                            <div className="col-md-8">
                                <img style={{ maxWidth: '100%', display: 'block' }} id="image" />
                            </div>
                            {
                                cropper &&
                                <div className="col-md-3 offset-1">
                                    <div className="preview" style={{ overflow: 'hidden', height: 200 }}>
                                    </div>
                                    <div>
                                        <button onClick={(e) => { this.handleRatio(e, 'ratio43') }} className={ratioName === 'ratio43' ? 'btn btn-success active' : 'btn btn-success'}>4 : 3</button>&nbsp;
                                        <button onClick={(e) => { this.handleRatio(e, 'ratio169') }} className={ratioName === 'ratio169' ? 'btn btn-success active' : 'btn btn-success'}>16 : 9</button>
                                    </div>
                                </div>
                            }
                        </div>
                    </div>

                    <button className="btn btn-secondary" onClick={createPageDown}>取消</button>
                    <button onClick={this.createNewData} className="btn btn-primary">新增</button>
                </form>
            </div>
        )
    }
}
