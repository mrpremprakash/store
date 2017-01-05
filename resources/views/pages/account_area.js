import React from 'react';
import InvoiceNotification from '../invoice/invoice_notification.js';
export default class AccountArea extends React.Component {
  constructor(props) {
    super(props);
  }
  render() {
    return (
      <ul className="account-area">
          <InvoiceNotification container={this.props.container}/>
          <li style={{display:'none'}}>
              <a className="dropdown-toggle" data-toggle="dropdown" title="Mails" href="#">
                  <i className="icon fa fa-envelope"></i>
                  <span className="badge">3</span>
              </a>

              <ul className="pull-right dropdown-menu dropdown-arrow dropdown-messages">
                  <li>
                      <a href="#">
                          <img src="assets/img/avatars/divyia.jpg" className="message-avatar" alt="Divyia Austin" />
                          <div className="message">
                              <span className="message-sender">
                                  Divyia Austin
                              </span>
                              <span className="message-time">
                                  2 minutes ago
                              </span>
                              <span className="message-subject">
                                  Heres the recipe for apple pie
                              </span>
                              <span className="message-body">
                                  to identify the sending application when the senders image is shown for the main icon
                              </span>
                          </div>
                      </a>
                  </li>
                  <li>
                      <a href="#">
                          <img src="assets/img/avatars/bing.png" className="message-avatar" alt="Microsoft Bing" />
                          <div className="message">
                              <span className="message-sender">
                                  Bing.com
                              </span>
                              <span className="message-time">
                                  Yesterday
                              </span>
                              <span className="message-subject">
                                  Bing Newsletter: The January Issue‏
                              </span>
                              <span className="message-body">
                                  Discover new music just in time for the Grammy® Awards.
                              </span>
                          </div>
                      </a>
                  </li>
                  <li>
                      <a href="#">
                          <img src="assets/img/avatars/adam-jansen.jpg" className="message-avatar" alt="Divyia Austin" />
                          <div className="message">
                              <span className="message-sender">
                                  Nicolas
                              </span>
                              <span className="message-time">
                                  Friday, September 22
                              </span>
                              <span className="message-subject">
                                  New 4K Cameras
                              </span>
                              <span className="message-body">
                                  The 4K revolution has come over the horizon and is reaching the general populous
                              </span>
                          </div>
                      </a>
                  </li>
              </ul>

          </li>
          <li style={{display:'none'}}>
              <a className="dropdown-toggle" data-toggle="dropdown" title="Tasks" href="#">
                  <i className="icon fa fa-tasks"></i>
                  <span className="badge">4</span>
              </a>

              <ul className="pull-right dropdown-menu dropdown-tasks dropdown-arrow ">
                  <li className="dropdown-header bordered-darkorange">
                      <i className="fa fa-tasks"></i>
                      4 Tasks In Progress
                  </li>
                  <li>
                      <a href="#">
                          <div className="clearfix">
                              <span className="pull-left">Account Creation</span>
                              <span className="pull-right">65%</span>
                          </div>

                          <div className="progress progress-xs">
                              <div style={{width: "65%"}} className="progress-bar"></div>
                          </div>
                      </a>
                  </li>
                  <li>
                      <a href="#">
                          <div className="clearfix">
                              <span className="pull-left">Profile Data</span>
                              <span className="pull-right">35%</span>
                          </div>

                          <div className="progress progress-xs">
                              <div style={{width: "35%"}} className="progress-bar progress-bar-success"></div>
                          </div>
                      </a>
                  </li>
                  <li>
                      <a href="#">
                          <div className="clearfix">
                              <span className="pull-left">Updating Resume</span>
                              <span className="pull-right">75%</span>
                          </div>

                          <div className="progress progress-xs">
                              <div style={{width: "75%"}} className="progress-bar progress-bar-darkorange"></div>
                          </div>
                      </a>
                  </li>
                  <li>
                      <a href="#">
                          <div className="clearfix">
                              <span className="pull-left">Adding Contacts</span>
                              <span className="pull-right">10%</span>
                          </div>

                          <div className="progress progress-xs">
                              <div style={{width: "10%"}} className="progress-bar progress-bar-warning"></div>
                          </div>
                      </a>
                  </li>
                  <li className="dropdown-footer">
                      <a href="#">
                          See All Tasks
                      </a>
                      <button className="btn btn-xs btn-default shiny darkorange icon-only pull-right"><i className="fa fa-check"></i></button>
                  </li>
              </ul>

          </li>
          <li style={{display:'none'}}>
              <a className="wave in" id="chat-link" title="Chat" href="#">
                  <i className="icon glyphicon glyphicon-comment"></i>
              </a>
          </li>
          <li>
              <a className="login-area dropdown-toggle" data-toggle="dropdown">
                  <div className="avatar" title="View your public profile">
                      <img src="assets/img/avatars/adam-jansen.jpg" />
                  </div>
                  <section>
                      <h2><span className="profile"><span>David Stevenson</span></span></h2>
                  </section>
              </a>

              <ul className="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                  <li className="username"><a>David Stevenson</a></li>
                  <li className="email"><a>David.Stevenson@live.com</a></li>

                  <li>
                      <div className="avatar-area">
                          <img src="assets/img/avatars/adam-jansen.jpg" className="avatar" />
                          <span className="caption">Change Photo</span>
                      </div>
                  </li>

                  <li className="edit">
                      <a href="profile.html" className="pull-left">Profile</a>
                      <a href="#" className="pull-right">Setting</a>
                  </li>

                  <li className="dropdown-footer">
                      <a href="{{ url('/logout') }}" data-params="">Logout</a>
                  </li>
              </ul>
          </li>
      </ul>
    )
  }
}
