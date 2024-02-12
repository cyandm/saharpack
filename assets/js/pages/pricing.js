import { activateEl, toggleActivateEl } from '../utils/functions';

const Pricing = () => {
	const pricingCollapseHandle = document.getElementById(
		'pricingCollapseHandle'
	);

	const pricingCollapse = document.getElementById('pricingCollapse');

	if (!pricingCollapse || !pricingCollapseHandle) return;

	console.log(pricingCollapse);

	pricingCollapseHandle.addEventListener('click', () => {
		toggleActivateEl(pricingCollapse);
	});
};

Pricing();
