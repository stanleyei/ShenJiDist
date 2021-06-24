import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import store from '../../redux/store'

export default class SideBar extends Component {

    loadingUp = (e) => {
        // console.log(this.props.location.pathname);
        // store.dispatch({ type: 'up', data: true })
        // 取得要去的頁面路徑
        // console.log(e.target.getAttribute('href').slice(1));
    }

    render() {
        const { loadingUp, loadingDown } = this.props
        return (
            <ul className="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <Link className="sidebar-brand d-flex align-items-center justify-content-center" to="/">
                    <div className="sidebar-brand-icon rotate-n-15">
                        <i className="fas fa-laugh-wink"></i>
                    </div>
                    <div className="sidebar-brand-text mx-3">審計新村走九遍</div>
                </Link>

                <hr className="sidebar-divider my-0" />
                <hr className="sidebar-divider" />

                <li className="nav-item">
                    <a className="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-column-info"
                        aria-expanded="true" aria-controls="collapse-column-info">
                        <i className="fas fa-fw fa-cog"></i>
                        <span>資訊</span>
                    </a>
                    <div id="collapse-column-info" className="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div className="bg-white py-2 collapse-inner rounded">
                            <h6 className="collapse-header">INFO:</h6>
                            <Link className="collapse-item" to="/admin/infotype" onClick={this.loadingUp}>資訊類型</Link>
                            <Link className="collapse-item" to="/info">資訊列表</Link>
                            <Link className="collapse-item" to="/infoimg">資訊圖片</Link>
                        </div>
                    </div>
                </li>

                <li className="nav-item">
                    <a className="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-column-shop"
                        aria-expanded="true" aria-controls="collapse-column-shop">
                        <i className="fas fa-store-alt"></i>
                        <span>店家</span>
                    </a>
                    <div id="collapse-column-shop" className="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div className="bg-white py-2 collapse-inner rounded">
                            <h6 className="collapse-header">SHOP:</h6>
                            <Link className="collapse-item" to="/shoptype">店家類型</Link>
                            <Link className="collapse-item" to="/shop">店家列表</Link>
                            <Link className="collapse-item" to="/shopimg">店家圖片</Link>
                        </div>
                    </div>
                </li>

                <li className="nav-item">
                    <a className="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-column-slider"
                        aria-expanded="true" aria-controls="collapse-column-slider">
                        <i className="fas fa-sliders-h"></i>
                        <span>Slider</span>
                    </a>
                    <div id="collapse-column-slider" className="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div className="bg-white py-2 collapse-inner rounded">
                            <h6 className="collapse-header">SLIDER:</h6>
                            <Link className="collapse-item" to="/slider">Slider</Link>
                        </div>
                    </div>
                </li>

                <li className="nav-item">
                    <a className="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-column-view"
                        aria-expanded="true" aria-controls="collapse-column-view">
                        <i className="fas fa-mountain"></i>
                        <span>景點</span>
                    </a>
                    <div id="collapse-column-view" className="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div className="bg-white py-2 collapse-inner rounded">
                            <h6 className="collapse-header">VIEW:</h6>
                            <Link className="collapse-item" to="/view">景點列表</Link>
                            <Link className="collapse-item" to="/viewimg">景點圖片</Link>
                        </div>
                    </div>
                </li>

                <li className="nav-item">
                    <a className="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-column-contact"
                        aria-expanded="true" aria-controls="collapse-column-contact">
                        <i className="fas fa-phone-square-alt"></i>                        
                        <span>連絡資料</span>
                    </a>
                    <div id="collapse-column-contact" className="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div className="bg-white py-2 collapse-inner rounded">
                            <h6 className="collapse-header">CONTACT:</h6>
                            <Link className="collapse-item" to="/contacttype">連絡類型</Link>
                            <Link className="collapse-item" to="/contactcontenttype">連絡內容類型</Link>
                            <Link className="collapse-item" to="/contact">連絡內容</Link>
                        </div>
                    </div>
                </li>

                <hr className="sidebar-divider" />

                <div className="text-center d-none d-md-inline">
                    <button className="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
        )
    }
}
