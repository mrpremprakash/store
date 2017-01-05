import React from 'react';

export default class InvoiceNotification extends React.Component {
  constructor(props) {
    super(props);
  }
  render() {
    var self = this;
    var container = this.props.container.state;
    if(container.invoice_notification_items.length == 0) {
      return (<span></span>)
    }
    return (
      <li>
          <a className=" dropdown-toggle wave in" data-toggle="dropdown" title="Notifications" href="#">
              <i className="icon fa fa-medkit"></i>
              <span className="badge">{container.invoice_notification_items.length}</span>
          </a>
          <ul className="pull-right dropdown-menu dropdown-arrow dropdown-notifications">
              {
                container.invoice_notification_items.map(function(item, index) {
                  return (
                    <li key={index}>
                        <a href="#">
                            <div className="clearfix">
                                <div className="notification-icon">
                                    <i className="fa fa-check bg-darkorange white"></i>
                                </div>
                                <div className="notification-body">
                                    <span className="title">{item.label}</span>
                                    <span className="description">{item.desc}</span>
                                </div>
                                <div className="notification-extra">
                                    <i className="fa fa-inr"></i>
                                    <span className="description">{item.price}</span>
                                </div>
                            </div>
                        </a>
                    </li>
                  )
                })
              }
              <li className="dropdown-footer ">
                  <span>
                      Today, March 28
                  </span>
                  <span className="pull-right">
                      10°c
                      <i className="wi wi-cloudy"></i>
                  </span>
              </li>
          </ul>
      </li>
    )
  }
}
