import React from 'react';

export default class Leftnav extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      menus: [
        {label: 'Home', icon_class: 'fa fa-home', submenu: []},
        {label: 'Warehouse', icon_class: 'fa fa-table', submenu: [
          {label: 'Team Members'},
          {label: 'Letterhead'},
          {label: 'Chat'},
          {label: 'Todo List'},
          {label: 'Offer List'},
        ]},
        {label: 'Medicine', icon_class: 'fa fa-desktop', submenu: [
          {label: 'List', ajax_url: 'shop_medicine'},
          {label: 'Add'},
        ]},
        {label: 'Invoice', icon_class: 'fa fa-folder-open', submenu: [
          {label: 'List'},
          {label: 'Add'},
          {label: 'Print'},
        ]},
        {label: 'Profile', icon_class: 'fa fa-picture-o', submenu: []}
      ]
    };
  };
  render() {
    var self = this;
    return (
      <div className="page-sidebar" id="sidebar">
        <div className="sidebar-header-wrapper">
            <input type="text" className="searchinput" />
            <i className="searchicon fa fa-search"></i>
            <div className="searchhelper">Search Reports, Charts, Emails or Notifications</div>
        </div>
        <ul className="nav sidebar-menu">
          {
            this.state.menus.map(function(item, index) {
              var ContainerComponent = self.props.container;
              var active_class = (ContainerComponent.state.active_menu == item.label) ? 'active': '';
              var icon_class = 'menu-icon ' + item.icon_class;
              var showChildren = (item.submenu.length) ? 'menu-dropdown': '';
              var menu_path = [item.label];
              return (
                <li className={active_class} key={index}>
                    <a href="javascript:void(0);" onClick={ContainerComponent.renderPage.bind(ContainerComponent, menu_path, item.ajax_url)} className={showChildren}>
                        <i className={icon_class}></i>
                        <span className="menu-text"> {item.label} </span>
                    </a>
                    <ul className="submenu">
                      {
                        item.submenu.map(function(submenu, index_sub) {
                          var sub_menu_path = [menu_path[0], submenu.label];
                          return (
                            <li key={index_sub}>
                              <a href="javascript:void(0);" className="active" onClick={ContainerComponent.renderPage.bind(ContainerComponent, sub_menu_path, submenu.ajax_url)}>
                                <span className="menu-text">{submenu.label}</span>
                              </a>
                            </li>
                          )
                        })
                      }
                    </ul>
                </li>
              )
            })
          }
        </ul>
      </div>
    );
  };

  componentDidMount() {
    window.InitiateSideMenu();
    window.InitiateSettings();
    window.InitiateWidgets();
  };
}
