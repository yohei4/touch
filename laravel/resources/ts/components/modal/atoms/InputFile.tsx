import React from "react";

interface InputFileProps {
    name: string;
    type: any;
}

const InputFile = (props: InputFileProps) => {

    const defaultFileName = '選択されていません';

    //画像ファイルを表示
    const previewImage = (obj: any): void => {
        const fileReader = new FileReader();
        const canvas = document.querySelector('#preview') as HTMLCanvasElement;
        fileReader.onload = (function() {
            var ctx = canvas.getContext('2d');
            const image = new Image() as HTMLImageElement;
            image.src = fileReader.result.toString();
            image.onload = (function () {
                canvas.width = image.width;
                canvas.height = image.height;
                ctx.drawImage(image, 0, 0);
            });
        });
        if(obj.files[0])  {
            fileReader.readAsDataURL(obj.files[0]);
            console.log(obj.files[0]);
            setFileName(obj.files[0].name);
        }
        else {
            console.log(new Blob);
            fileReader.readAsDataURL(new Blob);
        }
    }

    //ファイル名を出力
    const setFileName = (value: string): void => {
        const target = document.querySelector('.form-file__name');
        if(target) {
            target.innerHTML = value;
            cancelBtnView();
        }
    }

    //ファイルの削除
    const deleteFlieName = (e: any) => {
        e.innerHTML = defaultFileName;
        const target = document.querySelector('input[type=file]') as HTMLInputElement;
        if(target) target.value = '';
        console.log('input[type=file] ' + target.value);
    }

    //キャンセルボタン表示　
    const cancelBtnView = (): void => {
        const target = document.querySelector('.cancel-btn');
        if(target) target.classList.add('view');
    }

    const canselBtnClick = (e: any) => {
        if(e.target) e.target.classList.remove('view');
        const target = document.querySelector('.form-file__name');
        if (target) deleteFlieName(target);
    }

    //参照ボタン
    const browseBtn = (): void => {
        const target = document.querySelector('input[type=file]') as HTMLInputElement;
        if(target) target.click();
    }

    return (
        <React.Fragment>
            <div className="modal-form__item">
                <div className="modal-form__fname">
                    <button type="button" className="cancel-btn" onClick={e => canselBtnClick(e)}></button>
                    <span className="form-file__name">{defaultFileName}</span>
                </div>
                <label className="modal-form__label" htmlFor={props.name}>
                    <button type="button" className="browse-btn" onClick={() => browseBtn()}><i className="fas fa-folder"></i></button><input className="modal-form__input d-none" onChange={e => previewImage(e.target)} multiple type={props.type} name={props.name} id={props.name} />
                </label>
            </div>
            <div className="preview-outer">
                <canvas id="preview"></canvas>
            </div>
        </React.Fragment>
    );
}

export default InputFile;
