import React, { useEffect, useRef, forwardRef } from "react";
import ReactDOM from 'react-dom';

interface InputFileProps {
    name: string;
};

const InputFile = forwardRef((props: InputFileProps, ref: any) => {

    const defaultFileName = '選択されていません';
    const defaultDnd = 'images/dnd.jpg';
    const [fileName, setFileName] = React.useState(defaultFileName);
    const clearBtn = useRef(null);
    const canvas = useRef(null);

    //ファイル選択
    const selectFile = (e: any): void => {
        const files = e.target.files;
        if(files.length > 0) {
            const file = files[0];
            setFileName(file.name);
            previewImage(file);
            clearBtnView();
        }
    };

    //画像ファイルを表示
    const previewImage = (file: any): void => {
        const reader = new FileReader();
        const ctx = canvas.current.getContext('2d');
        const image = new Image() as HTMLImageElement;
        reader.onload = (function() {
            image.src = reader.result.toString();
            image.onload = (function () {
                canvas.current.width = image.width;
                canvas.current.height = image.height;
                ctx.drawImage(image, 0, 0);
            });
        });
        reader.readAsDataURL(file);
    };

    //画像ファイルを非表示
    const hideImage = (): void => {
        const ctx = canvas.current.getContext('2d');
        ctx.clearRect(0, 0, canvas.current.width, canvas.current.height);
    };

    //ファイルの削除
    const deleteFlieName = (): void => {
        setFileName(defaultFileName);
        ref.current.value = '';
    };

    //キャンセルボタン表示　
    const clearBtnView = (): void => {
        clearBtn.current.classList.add('view');
    };

    //クリアボタンのクリックイベント
    const clearBtnClick = (e: any): void => {
        deleteFlieName();
        clearBtn.current.classList.remove('view');
        hideImage();
    };

    //参照ボタンのクリックイベント
    const browseBtnClick = (): void => {
        ref.current.click();
    };

    return (
        <React.Fragment>
            <div className="form-file">
                <div className="form-file__inner">
                    <button type="button" className="clear-btn" ref={clearBtn} onClick={e => clearBtnClick(e)}></button>
                    <span className="form-file__name">{fileName}</span>
                </div>
                <label className="form-file__label" htmlFor={props.name}>
                    <button type="button" className="browse-btn" onClick={() => browseBtnClick()}><i className="fas fa-folder"></i></button>
                    <input id={props.name} className="modal-form__input d-none" ref={ref} onChange={e => selectFile(e)} type='file' name={props.name} multiple/>
                </label>
            </div>
            <div className="preview-outer">
                <canvas ref={canvas} id="preview"></canvas>
            </div>
        </React.Fragment>
    )
});

export default InputFile;
