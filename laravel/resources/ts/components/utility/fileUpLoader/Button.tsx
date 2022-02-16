interface ButtonProps {
    onClick(event: any): void;
};

const Button = (props: ButtonProps) => {
    return (
        <button type="button" className="photo-item__btn" onClick={props.onClick} name="delete">
            <span className="photo-item__btn--inner"></span>
        </button>
    )
};

export default Button;
