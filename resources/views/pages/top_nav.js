import React from 'react';
import AccountArea from './account_area.js';

export default class Topnav extends React.Component {
  constructor(props) {
    super(props);
  };

  render() {
    return (
      <div className="navbar">
              <div className="navbar-inner">
                  <div className="navbar-container">
                      <div className="navbar-header pull-left">
                          <a href="#" className="navbar-brand">
                              <small>
                                  <img src="assets/img/logo.png" alt="" />
                              </small>
                          </a>
                      </div>
                      <div className="sidebar-collapse" id="sidebar-collapse">
                          <i className="collapse-icon fa fa-bars"></i>
                      </div>
                      <div className="navbar-header pull-right">
                          <div className="navbar-account">
                              <AccountArea container={this.props.container}/>
                              <div className="setting">
                                  <a id="btn-setting" title="Setting" href="#">
                                      <i className="icon glyphicon glyphicon-cog"></i>
                                  </a>
                              </div><div className="setting-container">
                                  <label>
                                      <input type="checkbox" id="checkbox_fixednavbar" />
                                      <span className="text">Fixed Navbar</span>
                                  </label>
                                  <label>
                                      <input type="checkbox" id="checkbox_fixedsidebar" />
                                      <span className="text">Fixed SideBar</span>
                                  </label>
                                  <label>
                                      <input type="checkbox" id="checkbox_fixedbreadcrumbs" />
                                      <span className="text">Fixed BreadCrumbs</span>
                                  </label>
                                  <label>
                                      <input type="checkbox" id="checkbox_fixedheader" />
                                      <span className="text">Fixed Header</span>
                                  </label>
                              </div>

                          </div>
                      </div>

                  </div>
              </div>
          </div>
    )
  };
}
