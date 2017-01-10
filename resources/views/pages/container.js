import React from 'react';
import Topnav from './top_nav.js';
import Leftnav from './left_nav.js';
import Home from './home.js';
import MedicineList from '../medicine/list.js';
import MedicineAdd from '../medicine/add.js';
import TeamMember from '../team_member.js';
import Profile from './profile.js';
import InvoiceAdd from '../invoice/add.js';
import InvoicePrint from '../invoice/print.js';
import ExpiryAlert from '../settings/expiry_alert.js';

export default class Container extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      active_menu: 'Home',
      items: [],
      invoice_notification_items: [],
      settings: []
    };
  };
  render() {
    return (
      <div>
        <Topnav container={this}/>
        <div className="main-container container-fluid">
            <div className="page-container">
                <Leftnav container={this}/>
                {this.state.active_menu == 'Home' && <Home container={this}/>}
                {this.state.active_menu == 'Medicine/List' && <MedicineList container={this}/>}
                {this.state.active_menu == 'Medicine/Add' && <MedicineAdd container={this}/>}
                {this.state.active_menu == 'Warehouse/Team Members' && <TeamMember container={this}/>}
                {this.state.active_menu == 'Profile' && <Profile container={this}/>}
                {this.state.active_menu == 'Invoice/Add' && <InvoiceAdd container={this}/>}
                {this.state.active_menu == 'Invoice/Print' && <InvoicePrint container={this}/>}
                {this.state.active_menu == 'Settings/Expiry Alert' && <ExpiryAlert container={this}/>}
            </div>
        </div>
      </div>
    )
  };
  renderPage(menu_path, ajax_url) {
    var self = this;
    var state = {active_menu: menu_path.join('/')};
    this.setState(state);
    if(ajax_url) {
      this.getData(ajax_url);
    }
  };

  getData(ajax_url) {
    var self = this;

    $.ajax({
      url: ajax_url,
      type: 'get',
      success: function(response) {

        self.setState({
          items: response.result
        });
      }
    });
  };
  getSetting(data = {}) {
    return $.get('setting', data);
  };
  getMedicines(data = {}) {
    return $.get('shop_medicine', data);
  };
  componentDidMount() {
    var self = this;
    $.when(this.getSetting(), this.getMedicines()).done(function() {
      var settings = arguments[0];
      var medicines = arguments[1];

      self.setState({
        items: medicines[0].result,
        settings: settings[0].result
      });
    });
  }
}
