import {
	errorToast,
	successFormToast,
	successToast,
} from '../modules/toastify';
import { activateEl, toggleActivateEl } from '../utils/functions';

const Pricing = () => {
	const pricingCollapseHandle = document.getElementById(
		'pricingCollapseHandle'
	);

	const pricingCollapse = document.getElementById('pricingCollapse');

	if (!pricingCollapse || !pricingCollapseHandle) return;

	pricingCollapseHandle.addEventListener('click', () => {
		toggleActivateEl(pricingCollapse);
	});
};

Pricing();

const PricingForm = () => {
	const priceForm = document.getElementById('priceForm');
	if (!priceForm) return;

	const submitBtn = priceForm.querySelector('button[type="submit"]');
	if (!submitBtn) return;

	priceForm.addEventListener('submit', (e) => {
		e.preventDefault();
		const formData = new FormData(e.currentTarget, e.submitter);
		formData.append('_nonce', cyn_head_script.nonce);
		formData.append('action', 'cyn_pricing_form');

		jQuery(($) => {
			$.ajax({
				url: cyn_head_script.url,
				type: 'post',
				cache: false,
				processData: false,
				contentType: false,
				data: formData,
				success: (res) => {
					successFormToast.showToast();
					priceForm.reset();
				},
				error: () => {
					errorToast.showToast();
				},
			});
		});
	});
};

PricingForm();
