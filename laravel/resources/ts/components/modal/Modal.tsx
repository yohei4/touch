import React, { createRef, useEffect } from 'react';
import ReactDOM from 'react-dom';
import {Content} from './index';

interface ModalProps {
    modalIsOpen: boolean;
};

function Modal(props: ModalProps) {
    const modal = createRef<HTMLDivElement>();
    const [modalIsOpen, setIsOpen] = React.useState(props.modalIsOpen);

    useEffect(() => {
        const parentEl = modal.current.parentElement.parentElement;

        const timeout = setInterval(() => {
            if (modalIsOpen) {
                modalOpen(parentEl);
            } else {
                modalClose(parentEl);
            }
        }, 400);

        // アンマウント
        return () => clearInterval(timeout);

    },[modalIsOpen]);

    const modalOpen = (el: any) :void => {
        el.classList.add('js-show__modal');
    }

    const modalClose = (el: any):void => {
        el.classList.add('js-close__modal');
        el.classList.remove('js-show__modal');
    }

    return (
        <div className="modal-content" ref={modal}>
            <Content
                setIsOpen={setIsOpen}
            />
        </div>
    )
};

export default Modal;

if (document.getElementById('modal-main')) {
    ReactDOM.render(<Modal modalIsOpen={true}/>, document.getElementById('modal-main'));
}

