<?php  
$this->load->view('templates/header');
$this->load->view('templates/topnav');
$this->load->view('templates/wrapper');
$this->load->view('templates/heading');
$this->load->view('templates/loader'); 
?>

<div id="like_button_container"></div>

<script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>

<script type="text/babel">
'use strict';

const e = React.createElement;

class LikeButton extends React.Component {
  constructor(props) {
    super(props);
    this.state = { liked: false };
  }

  render() {
    if (this.state.liked) {
      return 'You liked this.';
    }

    return e(
      'button',
      { onClick: () => this.setState({ liked: true }) },
      'Like'
    );
  }
}

class QuoteMaker extends React.Component 
{
    render() 
    {
        return (
            <table className="table table-sm tablehover table-bordered border border-gainsboro-2" id="tblSOProd">
                <thead>
                    <tr className="bg-whitesmoke">
                        <td className="align-middle text-nowrap font-weight-bold small py-2 text-left w-50">
                            Product
                        </td>
                        <td className="align-middle text-nowrap font-weight-bold small py-2 text-center">
                            Quantity
                        </td>
                        <td className="align-middle text-nowrap font-weight-bold small py-2 text-center">
                            Price per unit
                        </td>
                        <td className="align-middle text-nowrap font-weight-bold small py-2 text-center">
                            Total price
                        </td>
                        <td className="align-middle text-nowrap font-weight-bold small py-2"></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td className="align-middle text-nowrap font-weight-bold small p-0 text-left">
                            <input list="listProdName" name="txtProdName" id="txtProdName" className="form-control form-control-sm border-0 rounded-0" placeholder="Enter or search by product id or name." />   
                            <datalist id="listProdName"></datalist>
                        </td>
                        <td className="align-middle text-nowrap font-weight-bold small p-0 text-left input-group border-0">
                            <input type="number" step="any" name="txtProdQty" id="txtProdQty" className="form-control form-control-sm border-0 rounded-0 text-right" />  
                            <div className="input-group-append">
                                <span className="font-weight-normal pt-1 px-1" id="prodQtyUOM"></span>
                            </div>
                        </td>
                        <td className="align-middle text-nowrap font-weight-bold small p-0 text-left">
                            <div className="input-group border-0">
                                <input type="number" step="any"  name="txtProdPrice" id="txtProdPrice" className="form-control form-control-sm border-0 rounded-0 text-right" />  
                                <div className="input-group-append">
                                    <span className="font-weight-normal pt-1 px-1" id="prodPriceCurr">USD</span>
                                </div>
                            </div>    
                        </td>
                        <td className="align-middle text-nowrap font-weight-bold small p-0 text-left">
                            <div className="input-group border-0">
                                <input type="number" step="any" name="txtTotalPrice" id="txtTotalPrice" className="form-control form-control-sm border-0 rounded-0 text-right" />  
                                <div className="input-group-append">
                                    <span className="font-weight-normal pt-1 px-1" id="totalPriceCurr">USD</span>
                                </div>
                            </div>
                        </td>
                        <td className="align-middle text-nowrap font-weight-bold small p-0"></td>
                    </tr>
                </tbody>
            </table>
        ); 
    }
}

const domContainer = document.querySelector('#like_button_container');
ReactDOM.render(<QuoteMaker />, domContainer);
</script>




<?php $this->load->view('templates/footer'); ?>