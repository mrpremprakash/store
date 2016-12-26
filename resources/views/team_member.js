import React from 'react';

export default class TeamMember extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      items: [
        {name: 'Adam Johnson', avatar: 'adam-jansen.jpg', designation: 'Programmer', exp: '5 yesrs'},
        {name: 'Divyia Phillips', avatar: 'divyia.jpg', designation: 'Programmer', exp: '5 yesrs'},
        {name: 'Nicolai Larson', avatar: 'Matt-Cheuvront.jpg', designation: 'Programmer', exp: '5 yesrs'},
        {name: 'Bill Jackson', avatar: 'Sergey-Azovskiy.jpg', designation: 'Programmer', exp: '5 yesrs'},
        {name: 'Eric Clapton', avatar: 'John-Smith.jpg', designation: 'Programmer', exp: '5 yesrs'},
      ]
    };
  };
  render() {
    return (
      <div className="page-content">
        <div className="page-breadcrumbs">
          <ul className="breadcrumb">
            <li>
                <i className="fa fa-home"></i>
                <a href="#">Home</a>
            </li>
            <li className="active">Warehouse / Team Members</li>
          </ul>
        </div>

        <div className="page-body">
          <div className="row">
            <div className="col-lg-12">
              <div className="widget">
                <div className="widget-header bordered-bottom bordered-themesecondary">
                    <i className="widget-icon fa fa-tags themesecondary"></i>
                    <span className="widget-caption themesecondary">Team Members</span>
                </div>

                <div className="widget-body  no-padding">
                    <div className="tickets-container">
                        <ul className="tickets-list">
                          {
                            this.state.items.map(function(item, index) {
                              var avatar = 'assets/img/avatars/' + item.avatar;
                              return (
                                <li className="ticket-item" key={index}>
                                    <div className="row">
                                        <div className="ticket-user col-lg-6 col-sm-12">
                                            <img src={avatar} className="user-avatar" />
                                            <span className="user-name">{item.name}</span>
                                        </div>
                                        <div className="ticket-time  col-lg-4 col-sm-6 col-xs-12">
                                            <div className="divider hidden-md hidden-sm hidden-xs"></div>
                                            <span className="time">{item.designation}</span>
                                        </div>
                                        <div className="ticket-type  col-lg-2 col-sm-6 col-xs-12">
                                            <span className="divider hidden-xs"></span>
                                            <span className="type">{item.exp}</span>
                                        </div>
                                    </div>
                                </li>
                              )
                            })
                          }
                        </ul>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}
