import { Modal, RestaurantInfo } from "./index";
import ReactDOM from 'react-dom';

if (document.getElementById('modal-main')) {
    ReactDOM.render(<Modal modalIsOpen={true}/>, document.getElementById('modal-main'));
}

if (document.querySelector('#restaurant-info')) {
    ReactDOM.render(<RestaurantInfo/>, document.querySelector('#restaurant-info'));
}
