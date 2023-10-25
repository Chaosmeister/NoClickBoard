KB.on('dom.ready', function () {
    $(document).on('click', '.task-board', function (e) {
        if (e.target.classList.contains('fa') ||
            e.target.classList.contains('js-modal-medium')) {
            return;
        }
        e.preventDefault();
        e.stopImmediatePropagation();
    });
});