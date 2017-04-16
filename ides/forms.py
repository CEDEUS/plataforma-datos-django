from django import forms

privacidad_choice = [('publico','Publico'),  ('privado','Privado'), ('oculto', 'Oculto')]

class PrivForm(forms.Form):
	nombre = forms.CharField(required=False, max_length=100, widget=forms.HiddenInput())
	privacidad=forms.ChoiceField(widget=forms.RadioSelect, choices=privacidad_choice)

class SearchForm(forms.Form):
	find=forms.CharField(label='Filtrar capa...',max_length=200)