import React from 'react';
import MedicineStatusBar from './medicine_status_bar.js';
export default class Post extends React.Component {
  constructor(props) {
    super(props);
  };
  render() {
    return (
      <div className="page-content">
          <div className="page-breadcrumbs">
            <ul className="breadcrumb">
              <li>
                  <i className="fa fa-home"></i>
                  <a href="javascript:void(0);">Home</a>
              </li>
            </ul>
          </div>

          <div className="page-body">

            <MedicineStatusBar container={this.props.container}/>

            <div className="row">

              <div className="col-lg-6 col-md-12 col-sm-12 col-xs-12">
              <div className="databox databox-xxlg databox-vertical databox-shadowed bg-white radius-bordered padding-5">
                              <div className="databox-top">
                                  <div className="databox-row row-12">
                                      <div className="databox-cell cell-3 text-center">
                                          <div className="databox-number number-xxlg sonic-silver">164</div>
                                          <div className="databox-text storm-cloud">online</div>
                                      </div>
                                      <div className="databox-cell cell-9 text-align-center">
                                          <div className="databox-row row-6 text-left">
                                              <span className="badge badge-palegreen badge-empty margin-left-5"></span>
                                              <span className="databox-inlinetext uppercase darkgray margin-left-5">NEW</span>
                                              <span className="badge badge-yellow badge-empty margin-left-5"></span>
                                              <span className="databox-inlinetext uppercase darkgray margin-left-5">RETURNING</span>
                                          </div>
                                          <div className="databox-row row-6">
                                              <div className="progress bg-yellow progress-no-radius">
                                                  <div className="progress-bar progress-bar-palegreen" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style={{width: '78%'}}>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div className="databox-bottom">
                                  <div className="databox-row row-12">
                                      <div className="databox-cell cell-7 text-center  padding-5">
                                          <div id="dashboard-pie-chart-sources" className="chart" style={{padding: '0px', position: 'relative'}}><canvas className="flot-base" width="270" height="220" style={{direction: 'ltr', position: 'absolute', left: '0px', top: '0px', width: '270px', height: '220px'}}></canvas><canvas className="flot-overlay" width="270" height="220" style={{direction: 'ltr', position: 'absolute', left: '0px', top: '0px', width: '270px', height: '220px'}}></canvas></div>
                                      </div>
                                      <div className="databox-cell cell-5 text-center no-padding-left padding-bottom-30">
                                          <div className="databox-row row-2 bordered-bottom bordered-ivory padding-10">
                                              <span className="databox-text sonic-silver pull-left no-margin">Type</span>
                                              <span className="databox-text sonic-silver pull-right no-margin uppercase">PCT</span>
                                          </div>
                                          <div className="databox-row row-2 bordered-bottom bordered-ivory padding-10">
                                              <span className="badge badge-blue badge-empty pull-left margin-5"></span>
                                              <span className="databox-text darkgray pull-left no-margin hidden-xs">FEED</span>
                                              <span className="databox-text darkgray pull-right no-margin uppercase">46%</span>
                                          </div>
                                          <div className="databox-row row-2 bordered-bottom bordered-ivory padding-10">
                                              <span className="badge badge-orange badge-empty pull-left margin-5"></span>
                                              <span className="databox-text darkgray pull-left no-margin hidden-xs">PREFERRAL</span>
                                              <span className="databox-text darkgray pull-right no-margin uppercase">21%</span>
                                          </div>
                                          <div className="databox-row row-2 bordered-bottom bordered-ivory padding-10">
                                              <span className="badge badge-pink badge-empty pull-left margin-5"></span>
                                              <span className="databox-text darkgray pull-left no-margin hidden-xs">DIRECT</span>
                                              <span className="databox-text darkgray pull-right no-margin uppercase">12%</span>
                                          </div>
                                          <div className="databox-row row-2 bordered-bottom bordered-ivory padding-10">
                                              <span className="badge badge-palegreen badge-empty pull-left margin-5"></span>
                                              <span className="databox-text darkgray pull-left no-margin hidden-xs">EMAIL</span>
                                              <span className="databox-text darkgray pull-right no-margin uppercase">11%</span>
                                          </div>
                                          <div className="databox-row row-2 padding-10">
                                              <span className="badge badge-yellow badge-empty pull-left margin-5"></span>
                                              <span className="databox-text darkgray pull-left no-margin hidden-xs">ORGANIC</span>
                                              <span className="databox-text darkgray pull-right no-margin uppercase">10%</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
              </div>

              <div className="col-lg-6 col-md-3 col-sm-12 col-xs-12">
              <div className="orders-container">
                              <div className="orders-header">
                                  <h6>Latest Orders</h6>
                              </div>
                              <ul className="orders-list">
                                  <li className="order-item">
                                      <div className="row">
                                          <div className="col-lg-8 col-md-8 col-sm-8 col-xs-8 item-left">
                                              <div className="item-booker">Ned Stards</div>
                                              <div className="item-time">
                                                  <i className="fa fa-calendar"></i>
                                                  <span>10 minutes ago</span>
                                              </div>
                                          </div>
                                          <div className="col-lg-4 col-md-4 col-sm-4 col-xs-4 item-right">
                                              <div className="item-price">
                                                  <span className="currency">$</span>
                                                  <span className="price">400</span>
                                              </div>
                                          </div>
                                      </div>
                                      <a className="item-more" href="">
                                          <i></i>
                                      </a>
                                  </li>
                                  <li className="order-item top">
                                      <div className="row">
                                          <div className="col-lg-8 col-md-8 col-sm-8 col-xs-8 item-left">
                                              <div className="item-booker">Steve Lewis</div>
                                              <div className="item-time">
                                                  <i className="fa fa-calendar"></i>
                                                  <span>2 hours ago</span>
                                              </div>
                                          </div>
                                          <div className="col-lg-4 col-md-4 col-sm-4 col-xs-4 item-right">
                                              <div className="item-price">
                                                  <span className="currency">$</span>
                                                  <span className="price">620</span>
                                              </div>
                                          </div>
                                      </div>
                                      <a className="item-more" href="">
                                          <i></i>
                                      </a>
                                  </li>
                                  <li className="order-item">
                                      <div className="row">
                                          <div className="col-lg-8 col-md-8 col-sm-8 col-xs-8 item-left">
                                              <div className="item-booker">John Ford</div>
                                              <div className="item-time">
                                                  <i className="fa fa-calendar"></i>
                                                  <span>Today 8th July</span>
                                              </div>
                                          </div>
                                          <div className="col-lg-4 col-md-4 col-sm-4 col-xs-4 item-right">
                                              <div className="item-price">
                                                  <span className="currency">$</span>
                                                  <span className="price">220</span>
                                              </div>
                                          </div>
                                      </div>
                                      <a className="item-more" href="">
                                          <i></i>
                                      </a>
                                  </li>
                                  <li className="order-item">
                                      <div className="row">
                                          <div className="col-lg-8 col-md-8 col-sm-8 col-xs-8 item-left">
                                              <div className="item-booker">Kim Basinger</div>
                                              <div className="item-time">
                                                  <i className="fa fa-calendar"></i>
                                                  <span>Yesterday 7th July</span>
                                              </div>
                                          </div>
                                          <div className="col-lg-4 col-md-4 col-sm-4 col-xs-4 item-right">
                                              <div className="item-price">
                                                  <span className="currency">$</span>
                                                  <span className="price">400</span>
                                              </div>
                                          </div>
                                      </div>
                                      <a className="item-more" href="">
                                          <i></i>
                                      </a>
                                  </li>
                                  <li className="order-item">
                                      <div className="row">
                                          <div className="col-lg-8 col-md-8 col-sm-8 col-xs-8 item-left">
                                              <div className="item-booker">Steve Lewis</div>
                                              <div className="item-time">
                                                  <i className="fa fa-calendar"></i>
                                                  <span>5th July</span>
                                              </div>
                                          </div>
                                          <div className="col-lg-4 col-md-4 col-sm-4 col-xs-4 item-right">
                                              <div className="item-price">
                                                  <span className="currency">$</span>
                                                  <span className="price">340</span>
                                              </div>
                                          </div>
                                      </div>
                                      <a className="item-more" href="">
                                          <i></i>
                                      </a>
                                  </li>
                              </ul>
                              <div className="orders-footer">
                                  <a className="show-all" href=""><i className="fa fa-angle-down"></i> Show All</a>
                                  <div className="help">
                                      <a href=""><i className="fa fa-question"></i></a>
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
