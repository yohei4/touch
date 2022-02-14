interface ButtonProps {
    id: number;
    onClick(event: any): void;
};

const Button = (props: ButtonProps) => {
    return (
        <button type="button" className="photo-item__btn" data-key={props.id} onClick={props.onClick} name="delete">
            <span className="photo-item__btn--inner"></span>
        </button>
    )
};

export default Button;
