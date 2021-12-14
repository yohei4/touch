import React, { useRef } from "react"

const FormFileName = () => {
    const fName = useRef(null);
    const [fileName, setFileName] = React.useState('選択されていません');

    return (
        <span className="form-file__name" ref={fName}>{fileName}</span>
    )
}

export default FormFileName;
