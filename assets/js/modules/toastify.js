import Toastify from 'toastify-js';

const successColor = '#4caf50';
const errorColor = '#ef5350';

export const successToast = Toastify({
	text: 'عملیات با موفقیت انجام شد',
	style: {
		background: successColor,
	},
});

export const errorToast = Toastify({
	text: 'عملیات با خطا مواجه شد',
	style: {
		background: errorColor,
	},
});

export const successFormToast = Toastify({
	text: 'فرم با موفقیت ارسال شد',
	style: {
		background: successColor,
	},
});
