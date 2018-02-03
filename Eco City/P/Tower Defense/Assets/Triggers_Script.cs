using UnityEngine;
using System.Collections;

public class Triggers_Script : MonoBehaviour {

	public GameManager gameManager;

	void OnTriggerEnter (Collider col)
	{
		Debug.Log ("EI");
		//gameManager.liveLost = true;
		/*
		if (col.gameObject.name == "Cylinder") {
			gameManager.eatItemSound.Play ();
			col.transform.position = new Vector3 (23.0f, 1.0f, col.transform.position.z);
			col.transform.localScale = new Vector3 (0.7470246f, 0.7470246f, 0.7470246f);
			gameManager.points += 1000;
	
		if (col.gameObject.name == "Gosht") {
			if (gameManager.pacMan_Script.pacManState == PacManState.Normal) {
				gameManager.deathSound.Play ();
				gameManager.liveLost = true;
			} else if (gameManager.pacMan_Script.pacManState == PacManState.PowerUp) {
				gameManager.eatItemSound.Play ();
				Destroy (col.gameObject);
				gameManager.points += 7500;
			}
		}
			*/

	}
		
}