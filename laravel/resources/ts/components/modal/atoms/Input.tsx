interface InputProps {
    name: string;
    txt?: string;
    type: any;
}

const Input = (props: InputProps) => {
    return (
        <div className="modal-form__item">
            <label className="modal-form__label" htmlFor={props.name}>{props.txt}：</label>
            <input className="modal-form__input" type={props.type} name={props.name} id={props.name} />
        </div>
    );
}

export default Input;
