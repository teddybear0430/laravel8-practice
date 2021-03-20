import EasyMDE from 'easyMDE';

window.addEventListener('DOMContentLoaded', () => {
  const myTextArea = document.getElementById('my-text-area');

  const easyMDE = new EasyMDE({
    element: myTextArea
  });

  // エディターのテキストを隠し要素のテキストエリアにコピーする
  const hiddenEditor = document.getElementById('hidden-editor');

  easyMDE.codemirror.on('change', () => {
    const body = easyMDE.value();
    hiddenEditor.textContent = body;
  });
});
