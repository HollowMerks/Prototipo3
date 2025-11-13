# TODO: Modify UsuarioCampusMarket Filament Resource

## Tasks
- [x] Update UsuariosCampusMarket model: Remove duplicate fillable fields (Nombres, Correo_Electronico, Contrasena), add user_id
- [x] Update UsuarioCampusMarketResource: Add 'user' to getEloquentQuery with()
- [x] Update UsuarioCampusMarketForm: Remove duplicate inputs, add user_id Select with inline creation
- [x] Update UsuarioCampusMarketsTable: Change Nombres and Correo_Electronico columns to use user.name and user.email
- [x] Create CreateUsuarioCampusMarket page
- [x] Add user relationship to User model
- [x] Fix createOptionUsing closures for Carrera and Universidad selects
- [x] Fix import for Filament\Forms\Schema
- [x] Add user relationship to UsuariosCampusMarket model
- [x] Ensure migrations are up to date (usuarios_campus_markets table exists)
- [ ] Test the Resource in Filament for create, edit, list functionality
