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
                        <li className="ticket-item">
                            <div className="row">
                                <div className="ticket-user col-lg-4 col-sm-12">
                                    <span className="user-name">Name</span>
                                </div>
                                <div className="ticket-time  col-lg-2 col-sm-6 col-xs-12">
                                    <div className="divider hidden-md hidden-sm hidden-xs"></div>
                                    <span className="time">Price</span>
                                </div>
                                <div className="ticket-time  col-lg-2 col-sm-6 col-xs-12">
                                    <div className="divider hidden-md hidden-sm hidden-xs"></div>
                                    <span className="time">Quantity</span>
                                </div>
                                <div className="ticket-type  col-lg-2 col-sm-6 col-xs-12">
                                    <span className="divider hidden-xs"></span>
                                    <span className="type">Purchase Date</span>
                                </div>
                                <div className="ticket-type  col-lg-2 col-sm-6 col-xs-12">
                                    <span className="divider hidden-xs"></span>
                                    <span className="type">Expiry Date</span>
                                </div>
                            </div>
                        </li>
                          {
                            this.props.container.state.items.map(function(item, index) {

                              return (
                                <li className="ticket-item" key={index}>
                                    <div className="row">
                                        <div className="ticket-user col-lg-4 col-sm-12">
                                            <img src={item.img} className="user-avatar" />
                                            <span className="user-name">{item.name}</span>
                                        </div>
                                        <div className="ticket-time  col-lg-2 col-sm-6 col-xs-12">
                                            <div className="divider hidden-md hidden-sm hidden-xs"></div>
                                            <span className="time">{item.price} &nbsp;<i className="fa fa-inr" aria-hidden="true"></i></span>
                                        </div>
                                        <div className="ticket-time  col-lg-2 col-sm-6 col-xs-12">
                                            <div className="divider hidden-md hidden-sm hidden-xs"></div>
                                            <span className="time">{item.qty}</span>
                                        </div>
                                        <div className="ticket-type  col-lg-2 col-sm-6 col-xs-12">
                                            <span className="divider hidden-xs"></span>
                                            <span className="type">{item.purchase_date}</span>
                                        </div>
                                        <div className="ticket-type  col-lg-2 col-sm-6 col-xs-12">
                                            <span className="divider hidden-xs"></span>
                                            <span className="type">{item.exp_date}</span>
                                        </div>
                                        <div className="ticket-state bg-palegreen">
                                            <i className="fa fa-check"></i>
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
