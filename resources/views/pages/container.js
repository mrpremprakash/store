import React from 'react';
import Topnav from './top_nav.js';
import Leftnav from './left_nav.js';
import Home from './home.js';
import MedicineList from '../medicine/list.js';
import TeamMember from '../team_member.js';
import Profile from './profile.js';
import Invoice from './invoice.js';

export default class Container extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      active_menu: 'Home',
      items: []
    };
  };
  render() {
    return (
      <div>
        <Topnav />
        <div className="main-container container-fluid">
            <div className="page-container">
                <Leftnav container={this}/>
                {this.state.active_menu == 'Home' && <Home container={this}/>}
                {this.state.active_menu == 'Medicine/List' && <MedicineList container={this}/>}
                {this.state.active_menu == 'Warehouse/Team Members' && <TeamMember container={this}/>}
                {this.state.active_menu == 'Profile' && <Profile container={this}/>}
                {this.state.active_menu == 'Invoice' && <Invoice container={this}/>}
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
      this.getData();
    }

  };

  getData() {
    var self = this;
    var root = 'https://jsonplaceholder.typicode.com';
    $.ajax({
      url: root+'/users',
      type: 'get',
      success: function(response) {

        self.setState({
          items: response
        });
      }
    });
  }
}
