# AudioFog

Share and play audio files for free.

## Todo & bugs

- fix prev and next btns
- test on firefox (as does not support mp3?)

### Future Features: Usability

- Additional Track Info
- share / embed button
- being able to delete an album
- album edit form
  - change song order
  - cover art
- Artist / uploader Profiles
- being able to upload multiple files as an album

### Future Features: Visual Pizazz

- generate album art based off keywords and title
- visualisation

- design
  - player in footer bar on bottom, all inline

### Future Features: Scaling Up for larger music collections

- filter by albums and years as well as tags
- Search
- Sort by Most and Least played
- sort by Track Length
- Default sort: Age

## Troubleshooting

### File Storage
- Have you created symlink?
- Have you added `http {
      client_max_body_size 20M;         
}` to `/etc/nginx/nginx.conf`
