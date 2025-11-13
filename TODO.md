# TODO: Modify UsuarioCampusMarket Filament Resource

## Tasks
- [x] Update UsuariosCampusMarket model: Remove duplicate fillable fields (Nombres, Correo_Electronico, Contrasena), add user relationship
- [x] Update UsuarioCampusMarketResource: Add 'user' to getEloquentQuery with()
- [x] Update UsuarioCampusMarketForm: Remove duplicate inputs, add user_id Select
- [x] Update UsuarioCampusMarketsTable: Change Nombres and Correo_Electronico columns to use user.name and user.email
- [x] Create CreateUsuarioCampusMarket page
- [x] Add user relationship to User model
- [x] Test the Resource in Filament for create, edit, list functionality
