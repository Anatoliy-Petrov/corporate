$(document).ready(function () {

///Chosen init
//     function initChosen2() {
//         var el = $('#calc_category, #hallmark');
//         el.chosen({
//             no_results_text: "Ничего не найдено!"
//         });
//
//         initCategory();
//         markSelectedCategory();
//         getSelectCategory(el)
//     }
//
//     initChosen2();
//
//     function initCategory(id) {
//         var el = $('#calc_category');
//         el.chosen().change(function () {
//             if (typeof el.chosen().val() !== 'undefined') {
//                 $('#hallmark').removeClass('fillable');
//                 initHallmarks(el.chosen().val());
//             }
//             // console.log(el.chosen().val());
//             $('#addHallmarkButton').prop("disabled", false);
//         });
//     }
//
//     function initHallmarks(id) {
//         // axios.get('/admin/calculator/hallmarks/get-hallmarks?id=' + id)
//         axios.post('/admin/calculator/hallmarks/get-hallmarks', {id: id})
//             .then(response => {
//                 fetchHallmarks(response);
//                 markSelectedHallmark();
//             })
//             .catch(error => {
//                 console.log(error);
//             });
//     }
//
//     function fetchHallmarks(response) {
//         let el = $('#hallmark');
//         el.chosen({
//             no_results_text: "Ничего не найдено!"
//         });
//
//         if (response) {
//             let hallmarks_selected = $('#hallmark').chosen().val();
//
//             if (!el.hasClass('fillable')) {
//                 clear();
//
//                 _.map(response.data, function (item) {
//                     el.append('<option value="' + item.id + '">' + item.hallmark + '</option>');
//                 });
//
//                 el.val(hallmarks_selected);
//
//                 el.trigger("chosen:updated");
//             }
//         }
//     }
//
//     function clear() {
//         let el = $('#hallmark');
//         el.empty();
//         el.append('<option value="0">Выберите пробу</option>');
//     }
//
//     function getSelectCategory(el) {
//         initHallmarks(el.chosen().val());
//     }
//
//     function markSelectedCategory() {
//         let el = $('#calc_category');
//         $('#calc_category > option[value="' + el.data('selected') + '"]').attr("selected", "selected");
//
//         if ($('#hallmark option:selected').length && $('#hallmark').hasClass('fillable')) {
//
//             let ids = $('#hallmark option:selected').map(function () {
//                 return $(this).data('calc_category');
//             }).get();
//
//             el.val(ids);
//             el.removeClass('fillable');
//         }
//
//         el.trigger("chosen:updated");
//     }
//
//     function markSelectedHallmark() {
//         let el = $('#hallmark');
//         $('#hallmark > option[value="' + el.data('selected') + '"]').attr("selected", "selected");
//         el.trigger("chosen:updated");
//     }

});