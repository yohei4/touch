import React from "react";

interface InputAreaProps {
    name: string;
    id: string;
    txt: string;
    value?: string;
    cols?: number;
    rows?: number;
    onChange(event: any): void;
}

const InputArea = (props: InputAreaProps) => {
    return (
        <React.Fragment>
            <textarea className="form-textarea form-control" cols={props.cols} rows={props.rows} name={props.name} id={props.id} defaultValue={props.value} placeholder={props.txt} onChange={event => props.onChange(event)}></textarea>
        </React.Fragment>

    )
}

export default InputArea;
