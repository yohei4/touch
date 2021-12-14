import React, { useEffect } from 'react';
import ReactDOM from 'react-dom';
import {Content} from './index';

function Modal() {
    const [modalIsOpen, setIsOpen] = React.useState(false);

    useEffect(() => {
        window.addEventListener('load', () => setIsOpen(true));
        if(modalIsOpen) modalOpen();
    });

    const modalOpen = () :void => {
        const modal = document.querySelector('#modal');
        if(!modal) return;

        modal.classList.add('js-show__modal');
    };

    return (
        <div className="modal-content">
            <Content />
        </div>
    );
}

export default Modal;

if (document.getElementById('modal-main')) {
    ReactDOM.render(<Modal />, document.getElementById('modal-main'));
}
