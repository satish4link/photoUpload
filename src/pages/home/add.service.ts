import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/catch';
import 'rxjs/add/observable/throw';

@Injectable()
export class AddService{
    constructor(private _http: Http){

    }

    addDesc(info){
        return this._http.post("http://192.168.100.106/photoUpload/insert.php", info)
        .map(()=>"")
        .catch(this._errorHandler);
    }

    _errorHandler(error: Response){
        console.error(error);
        return Observable.throw(error || "server error");
    }
}