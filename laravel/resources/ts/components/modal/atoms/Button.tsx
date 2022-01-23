interface ButtonProps {
    id: string;
    txt: string;
    type: any;
    onClick(): void;
};

const Button = (props: ButtonProps) => {
    return (
        <button type={props.type} id={props.id} className="modal-btn" onClick={props.onClick}>
            <span className="modal-btn__txt">{props.txt}</span>
        </button>
    )
};

export default Button;
