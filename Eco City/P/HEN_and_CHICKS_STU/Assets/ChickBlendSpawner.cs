using UnityEngine;
using System.Collections;
using Steerings;

public class ChickBlendSpawner : MonoBehaviour {


	public int numInstances = 4;
	public float interval = 1f; // one instance every interval seconds
	public float variationRatio = 0.25f;

	private GameObject sample;
	private GameObject mommyHen;
	private int generated;
	private float elapsedTime;


	// Use this for initialization
	void Start () {
		sample =  Resources.Load<GameObject> ("CHICK_BLEND");
		if (sample == null)
			Debug.LogError ("No CHICKEN prefab found as a resource");

		mommyHen = GameObject.Find ("HEN");
		if (mommyHen==null) 
			Debug.LogError ("No HEN gameobject found in the scene");
	}

	// Update is called once per frame
	void Update () {
		if (generated == numInstances)
			return;

		GameObject clone;
		if (elapsedTime >= interval) {
			// spawn creating an instance...
			clone = Instantiate(sample);
			clone.transform.position = mommyHen.transform.position;

			HenFollowingBlended chk = clone.GetComponent<HenFollowingBlended> ();
			if (chk == null)
				Debug.LogError ("CHICK_ARB has no HenFollowingBlended steering attached");
			chk.target = mommyHen;
			chk.angleWrpOrientation += chk.angleWrpOrientation * variationRatio * Utils.binomial ();
			chk.requiredDistance += chk.requiredDistance * variationRatio * Utils.binomial ();

			generated++;
			elapsedTime = 0;
		} else {
			elapsedTime += Time.deltaTime;
		}


	}
}
