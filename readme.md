## Edutalk

Maturaarbeit von Enes Emini.

Betreut von Guido Schöb.


Edutalk ist ein soziales Netzwerk für Schülerinnen, Schüler und Lehrpersonen zum Austausch von unterrichtsrelevanten Daten, welches im Rahmen einer Maturaarbeit an der Kantonsschule am Burggraben erstellt wurde. Ziel dieser Arbeit war es, ein soziales Netzwerk zu erstellen und einige Funktionen zu implementieren. Dabei diente Twitter als Inspiration. Die Kernfunktionalitäten bestehen in der Erstellung und Bearbeitung von Talks, die Erstellung und Bearbeitung von Gruppen und weiteren Funktionen, die in der Maturaarbeit näher erläutert werden.


### Verfügbare Routes
`/` Startseite.

`/dashbaord` Wenn man angemeldet ist, sieht man hier eine Übersicht der Gruppen, sowie alle neuen Talks der Benutzer, denen man folgt.

`/login` Der Benutzer kann sich anmelden, falls er bereits angemeldet ist, wird er auf die Startseite umgeleitet

`/logout` Der angemeldete Benutzer wird abgemeldet, sobald er diese Route besucht.

`/register` Der Benutzer kann sich registrieren, falls er bereits angemeldet ist, wird er auf die Startseite umgeleitet


`/@{username}` Darstellung des Profils eines Benutzers.
`/@{username}/edit` Formular zur Bearbeitung eines Benutzers.

`/@{username}/followers` Alle Benutzer, die dem Benutzer (username) folgen.
`/@{username}/following` Alle Benutzer, denen der Benutzer (username) folgt.


`/gruppen` Übersicht aller Gruppen, denen der angemeldete Benutzer beigetreten ist.

`/g/erstellen` Formular zur Erstellung einer Gruppe

`/g/{id}` Darstellung der Gruppe mit einer bestimmten id.

`/g/{id}/mitglieder` Übersicht aller Mitglieder einer Gruppe.

`/g/{id}/edit` Formular zur Bearbeitung einer bestimmten Gruppe.

`/g/{id}/delete` Eine Gruppe wird gelöscht, solbald der Admin diese Route aufruft.

`follow/{username}` Einem Benutzer folgen.

`unfollow/{username}` Einem Benutzer nicht mehr folgen.

