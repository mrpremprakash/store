import React from 'react';

export default class InvoicePrint extends React.Component {
  render() {
    return (
      <div className="page-content">
        <div className="page-breadcrumbs">
          <ul className="breadcrumb">
            <li>
                <i className="fa fa-folder-open"></i>
                <a href="javascript:void(0);">Invoice</a>
            </li>
          </ul>
        </div>

        <div className="page-body">
          <div className="row">
            <div className="col-lg-12 col-sm-12 col-xs-12">
            <div className="letter-head">

              <div className="letter-top">

                  <div className="logo">
                      <h1><a href="#"><i className="fa fa-laptop lblue"></i> Brave</a></h1>
                  </div>

                  <div className="letter-head-content">
                      <p><i className="fa fa-phone lblue"></i> &nbsp; + (838) - 839 934 8930</p>
                      <p><i className="fa fa-envelope lblue"></i> &nbsp; info@uksolution.com</p>
                  </div>

                  <div className="clearfix"></div>
              </div>
              <br />
              <hr />
              <br />

              <div className="letter-body">


                  <div className="invoice-content">
                      <strong>Invoice &nbsp; <span className="lblue">#</span>8982</strong> <strong className="pull-right bold">Date : 28/05/2014</strong>
                      <div className="clearfix"></div>
                      <br />
                      <div className="row">
                          <div className="col-md-6">

                              <div className="address">
                                  <div className="row">
                                      <div className="col-md-6 col-sm-6">

                                          <p><strong>Brave Private Ltd.,</strong><br />
                                              #89, Chamber Street,<br />
                                              West Building Road,<br />
                                              London - 838101.
                                          </p>
                                      </div>
                                      <div className="col-md-6 col-sm-6">

                                          <p><i className="fa fa-phone lblue"></i> &nbsp; + (322) - 829 421 5223<br />
                                              <i className="fa fa-envelope lblue"></i> &nbsp; service@solution.com<br />
                                              <i className="fa fa-globe lblue"></i> &nbsp; www.braveltd.com
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div className="col-md-6">

                              <div className="address">
                                  <div className="row">
                                      <div className="col-md-6 col-sm-6">

                                          <p><strong>Hanks Info Service.,</strong><br />
                                              #75, 20th Main Road, <br />
                                              Om Nagar, Madiwala,<br />
                                              Bangalore - 560068.
                                          </p>
                                      </div>
                                      <div className="col-md-6 col-sm-6">

                                          <p><i className="fa fa-phone lblue"></i> &nbsp; + (644) - 523 523 6343<br />
                                              <i className="fa fa-envelope lblue"></i> &nbsp; info@hanksinfo.com<br />
                                              <i className="fa fa-globe lblue"></i> &nbsp; www.hanksinfo.com
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <br />

                      <h6>Dear Mr. Mark, </h6>

                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt  from it but veritatis et quasi architecto beatae who has any right.</p>
                      <br />

                      <div className="table-responsive">

                          <table className="table table-hover">
                              <tbody><tr>
                                  <th>S.No</th>
                                  <th>Item Description</th>
                                  <th>Rate</th>
                                  <th>Quantity</th>
                                  <th>Amount</th>
                              </tr>
                              <tr>
                                  <td>01</td>
                                  <td>Sony Laptop (H492d)</td>
                                  <td>52000</td>
                                  <td>01</td>
                                  <td>52,000</td>
                              </tr>
                              <tr>
                                  <td>02</td>
                                  <td>Nokia Mobile (Lumia 520)</td>
                                  <td>8200</td>
                                  <td>02</td>
                                  <td>16,400</td>
                              </tr>
                              <tr>
                                  <td>03</td>
                                  <td>Nokia Charger(8493F)</td>
                                  <td>600</td>
                                  <td>05</td>
                                  <td>3,000</td>
                              </tr>
                              <tr>
                                  <td>04</td>
                                  <td>Apple Ipad (PZ7382)</td>
                                  <td>20000</td>
                                  <td>02</td>
                                  <td>40,000</td>
                              </tr>
                              <tr>
                                  <td>05</td>
                                  <td>Apple Laptop (ED8933)</td>
                                  <td>66000</td>
                                  <td>01</td>
                                  <td>66,000</td>
                              </tr>
                              <tr>
                                  <th></th>
                                  <th>Total Amount</th>
                                  <th></th>
                                  <th>11</th>
                                  <th>1,70,400</th>
                              </tr>
                          </tbody></table>
                      </div>


                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, quasi architecto beatae vitae dicta sunt  from it but veritatis et quasi architecto beatae  quasi architecto beatae vitae dicta sunt  from it but veritatis et quasi architecto beatae  eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt  from it but veritatis et quasi architecto beatae who has any right.</p>

                  </div>
              </div>
              <br />

              <div className="foot-lside">
                  Bangalore<br />
                  27-5-2014
              </div>

              <div className="foot-rside">
                  Yours Sincerely,<br />
                  Ravi Kumar
              </div>

              <div className="clearfix"></div>
              <br />
              <hr />

              <div className="letter-foot">
                  <div className="row">
                      <div className="col-md-4 col-sm-4">

                          <div className="address">

                              <div className="address-icon">
                                  <i className="fa fa-building lblue"></i>
                              </div>

                              <div className="address-content">
                                  #40, Industrial Estate,<br />
                                  Near Global IT Park,<br />
                                  Bangalore - 560068.
                              </div>
                              <div className="clearfix"></div>
                          </div>
                      </div>
                      <div className="col-md-4 col-sm-4">

                          <i className="fa fa-phone lblue"></i> &nbsp; + (832) - 493 382 4902<br />
                          <i className="fa fa-envelope lblue"></i> &nbsp; helpdesk@brave.com
                      </div>
                      <div className="col-md-4 col-sm-4">

                          <i className="fa fa-fax lblue"></i> &nbsp; + (382) 839 839 8930<br />
                          <i className="fa fa-globe lblue"></i> &nbsp; www.bravesolution.com
                      </div>
                  </div>
              </div>
          </div>
            </div>
          </div>
        </div>
      </div>

    );
  }
}
