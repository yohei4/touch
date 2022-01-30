import axios from 'axios';

function get(url: string, callback:(res: any) => void, option: any = null) {

    // axios を使って引数で指定された url に対してリクエストを投げる
    axios.get(url, option)
    .then(function(response) {

      // 返ってきたレスポンスはそのまま加工せずに callback で呼び出し元へ渡す
      callback(response);
    })
    .catch(function(error) {
      console.log('ERROR!! occurred in Backend.')
    });
}

export default get;
