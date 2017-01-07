import React from 'react';

export default class MedicineList extends React.Component {
  constructor(props) {
    super(props);

  };
  render() {
    var self = this;
    return (
      <div className="page-content">
        <div className="page-breadcrumbs">
          <ul className="breadcrumb">
            <li>
                <i className="fa fa-home"></i>
                <a href="#">Home</a>
            </li>
            <li className="active">Medicine / List</li>
          </ul>
        </div>

        <div className="page-body">
          <div className="row">
            <div className="col-lg-12">
              <div className="widget">
                <div className="widget-header bordered-bottom bordered-themesecondary">
                    <i className="widget-icon fa fa-tags themesecondary"></i>
                    <span className="widget-caption themesecondary">Medicine List</span>
                </div>

                <div className="widget-body  no-padding">
                    <div className="tickets-container">
                        <ul className="tickets-list">
                          {
                            this.props.container.state.items.map(function(item, index) {

                              return (
                                <li className="ticket-item" key={index}>
                                    <div className="row">
                                        <div className="ticket-user col-lg-6 col-sm-12">
                                            <img src={item.img} className="user-avatar" />
                                            <span className="user-name">{item.name}</span>
                                        </div>
                                        <div className="ticket-time  col-lg-4 col-sm-6 col-xs-12">
                                            <div className="divider hidden-md hidden-sm hidden-xs"></div>
                                            <span className="time">10 &nbsp;<i className="fa fa-inr" aria-hidden="true"></i></span>
                                        </div>
                                        <div className="ticket-type  col-lg-2 col-sm-6 col-xs-12">
                                            <span className="divider hidden-xs"></span>
                                            <span className="type">100</span>
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
