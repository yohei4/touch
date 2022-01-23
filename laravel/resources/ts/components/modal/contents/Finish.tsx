import React, { createRef, useEffect } from "react";
import { Title, Button } from './index';

interface FinishProps {
    setIsOpen(bool: boolean): void;
};

const Finish = (props: FinishProps) => {
    const onClick = ():void => {
        props.setIsOpen(false);
    }

    return (
        <React.Fragment>
            <Title
                txt={'データを登録しました。'}
            />
            <Button
                id={'finish'}
                txt={'完了'}
                type={'button'}
                onClick={() => onClick()}
            />
        </React.Fragment>
    )
};

export default Finish;
