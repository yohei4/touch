import React, { createRef, useEffect } from 'react';
import ReactDOM from 'react-dom';
import {Content} from './index';

function Modal() {
    const modal = createRef<HTMLDivElement>();
    const [modalIsOpen, setIsOpen] = React.useState(false);

    useEffect(() => {
        window.addEventListener('load', () => setIsOpen(true));
        if(modalIsOpen) modalOpen();
    });

    const modalOpen = () :void => {
        modal.current.parentElement.parentElement.classList.add('js-show__modal');
    };

    return (
        <div className="modal-content" ref={modal}>
            <Content />
        </div>
    )
};

export default Modal;

if (document.getElementById('modal-main')) {
    ReactDOM.render(<Modal />, document.getElementById('modal-main'));
};
