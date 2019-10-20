import { AbstractControl } from '@angular/forms';
import { Observable, Observer, of } from 'rxjs';

export const mimeType = (control: AbstractControl):
Promise<{[Key: string]: any}> | Observable <{[Key: string]: any}> => {
if (typeof(control.value) === 'string') {
  return of(null);
}
const file = control.value as File;
const fileReader = new FileReader();
const fileOb = new Observable((observer: Observer<{[Key: string]: any}>) => {
  fileReader.addEventListener('loadend', (e) => {
                            // fileReader.result | e.target[0]
    const arr = new Uint8Array(fileReader.result as any).subarray(0, 4);
    let header = '';
    let isValid = false;

    for (const head of arr) {
      header += head.toString(16);
    }

/*     for (let i = 0; i < arr.length; i++) {
      header += arr[i].toString(16);
    } */
    switch (header) {
      case '89504e47':
        isValid = true;
        // type = 'png';
        break;
        case '47494638':
        // type = 'GIF'
        isValid = true;
        break;
      case 'ffd8ffe0':
      case 'ffd8ffe1':
      case 'ffd8ffe2':
      case 'ffd8ffe3':
      case 'ffd8ffe8':
        isValid = true;
        // type = 'JPEG'
        break;
      default:
        isValid = false; // Or you can use the blob.type as fallback
        break;
    }
    if (isValid) {
      observer.next(null);
    } else {
      observer.next({ invalidMimeType: true });
    }
    observer.complete();
  });
  fileReader.readAsArrayBuffer(file);
});
return fileOb;
};
