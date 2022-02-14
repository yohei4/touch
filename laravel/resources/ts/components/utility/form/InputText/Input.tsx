import React from "react";

interface InputProps {
    name: string;
    id: string;
    txt: string;
    value?: string;
    onChange(event: any): void;
}

const Input = (props: InputProps) => {
    return (
        <React.Fragment>
            <input className="form-input form-control" type="text" name={props.name} id={props.id} defaultValue={props.value} placeholder={props.txt} onChange={e => props.onChange(e)}/>
        </React.Fragment>

    )
}

export default Input;
