import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { Route, HashRouter, Switch, Redirect } from 'react-router-dom'
import NavBar from './components/NavBar'
import SideBar from './components/SideBar'
import Home from './pages/Home'
import InfoType from './pages/InfoType'
import Info from './pages/Info'
import InfoImg from './pages/InfoImg'
import ShopType from './pages/ShopType'
import Shop from './pages/Shop'
import ShopImg from './pages/ShopImg'
import Slider from './pages/Slider'
import View from './pages/View'
import ViewImg from './pages/ViewImg'
import ContactType from './pages/ContactType'
import ContactContentType from './pages/ContactContentType'
import Contact from './pages/Contact'
import isLoadingGif from '../img/loading-buffering.gif'
import store from '../jsx2/redux/store'


export default class BackendSPA extends Component {

    state = {
        loadingUpTest: () => { this.setState({ isLoading: true }) },
        loadingDown: () => { this.setState({ isLoading: false }) }
    }

    componentDidMount(){
        store.subscribe(() => this.setState({}))
    }

    loadingUp = () => {
        store.dispatch({ type: 'up', data: true })
    }

    loadingDown = () => {
        store.dispatch({ type: 'down', data: false })
    }

    render() {
        const { isLoading } = this.state
        return (
            <div id="wrapper">
                <SideBar />
                <div id="content-wrapper" className="d-flex flex-column">
                    <div id="content">
                        <NavBar />
                        <div className="container-fluid">
                            <Switch>
                                <Route path="/admin/infotype" component={InfoType} />
                                <Route path="/info" component={Info} />
                                <Route path="/infoimg" component={InfoImg} />
                                <Route path="/shoptype" component={ShopType} />
                                <Route path="/shop" component={Shop} />
                                <Route path="/shopimg" component={ShopImg} />
                                <Route path="/slider" component={Slider} />
                                <Route path="/view" component={View} />
                                <Route path="/viewimg" component={ViewImg} />
                                <Route path="/contacttype" component={ContactType} />
                                <Route path="/contactcontenttype" component={ContactContentType} />
                                <Route path="/contact" component={Contact} />
                                <Route path="/" component={Home} />
                                <Redirect to="/" />
                            </Switch>
                        </div>
                    </div>
                </div>
                {
                    store.getState()
                    &&
                    <div style={{
                        position: 'absolute',
                        top: 0,
                        left: 0,
                        height: '100vh',
                        width: '100%',
                        backgroundColor: 'rgba(0, 0, 0, 0.2)',
                        zIndex: 9,
                        display: 'flex',
                        justifyContent: 'center',
                        alignItems: 'center'
                    }}>
                        <img src={isLoadingGif} alt="" />
                    </div>
                }
            </div>
        )
    }
}

ReactDOM.render(
    <HashRouter>
        <BackendSPA />
    </HashRouter>
    , document.getElementById('react-backendpage'))
