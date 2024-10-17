import mask from '@alpinejs/mask';
import '@tabler/core/dist/js/demo-theme';
import '@tabler/core/dist/js/tabler';
import TomSelect from 'tom-select';
import { Alpine, Livewire } from './../../vendor/livewire/livewire/dist/livewire.esm';
import './bootstrap';

window.TomSelect = TomSelect;

Alpine.plugin(mask);

Livewire.start();
